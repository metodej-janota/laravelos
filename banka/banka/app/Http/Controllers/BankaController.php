<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banka;
use App\Models\Kontokorent;
use App\Models\SporitelskyUver;

class BankaController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('potrebujesLogin.stav', [
            'aktivniUcet' => $user->aktivniUcet,
            'penizeNaUcet' => $user->penizeNaUcet,
            'aktivniKontokorent' => $user->aktivniKontokorent,
            'kontokorentLimit' => $user->kontokorentLimit,
            'aktivniSporitelskyUver' => $user->aktivniSporitelskyUver,
            'dohromady' => $user->dohromady,
            'uver' => $user->uver,
        ]);
    }

    public function aktivovatUcet(Request $request)
    {
        $user = Auth::user();
        $user->aktivniUcet = 1;
        $user->save();
        return redirect()->route('stav')->with('success', 'Učet byl úspěšně aktivován.');
    }

    public function vlozitPenize(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        $user = Auth::user();
        $user->penizeNaUcet += $request->amount;
        $user->save();
        return redirect()->route('stav')->with('success', 'Peníze byly úspěšně vloženy na váš účet.');
    }

    public function vyberPenize(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        $user = Auth::user();
        if ($user->penizeNaUcet >= $request->amount || ($user->aktivniKontokorent && $user->penizeNaUcet + $user->kontokorentLimit >= $request->amount)) {
            $user->penizeNaUcet -= $request->amount;
            $user->save();
            return redirect()->route('stav')->with('success', 'Peníze byly úspěšně vybrány z vašeho účtu.');
        } else {
            return redirect()->route('stav')->with('error', 'Nemáte dostatek peněz na účtu.');
        }
    }
}
