<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KontokorentController extends BankaController
{
    public function aktivovatKontokorent(Request $request)
    {
        $user = Auth::user();
        $user->aktivniKontokorent = 1;
        $user->save();
        return redirect()->route('stav')->with('success', 'Kontokorent byl úspěšně aktivován.');
    }

    public function setKontokorentLimit(Request $request)
    {
        $user = Auth::user();
        if ($user->penizeNaUcet < 0) {
            return redirect()->route('stav')->with('error', 'Nemáte dostatek peněz na účtu.');
        }
        $request->validate([
            'limit' => 'required|numeric|min:0',
        ]);
        $user = Auth::user();
        $user->kontokorentLimit = $request->limit;
        $user->save();
        return redirect()->route('stav')->with('success', 'Limit kontokorentu byl úspěšně nastaven.');
    }
}
