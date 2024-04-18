<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banka;
use App\Models\Kontokorent;
use App\Models\SporitelskyUver;
use Illuminate\Support\Facades\Auth;

class SporitelskyUverController extends BankaController
{
    public function aktivovatSpor(){
        $user = Auth::user();
        $user->aktivniSporitelskyUver = 1;
        $user->uver = 5;
        $user->save();
        return redirect()->route('stav')->with('success', 'sporak byl úspěšně aktivován.');
    }

    public function nastavitSpor(Request $request)
    {
        $user = Auth::user();
        if ($user->dohromady == 0) {
            $request->validate([
                'amount' => 'required|numeric|min:0',
            ]);
            $user->dohromady = $request->amount;
            $user->penizeNaUcet += $request->amount;
            $user->uver = 5;
            $user->save();
            return redirect()->route('stav')->with('success', 'Sporitelský účet byl úspěšně nastaven.');
        } else {
            return redirect()->route('stav')->with('error', 'ne');
        }
    }

    public function splatitSpor(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        $user = Auth::user();
        if ($user->dohromady == 0) {
            return redirect()->route('stav')->with('error', 'ne');
        }

        $tempCastka = $user->penizeNaUcet += ($request->amount / 100) * (100 - $user->uver);
        if ($tempCastka > $user->dohromady) {
            $user->penizeNaUcet = $tempCastka - $user->dohromady;
            $user->dohromady = 0;
            $user->save();
            return redirect()->route('stav')->with('success', 'jo');
        }

        $user->dohromady -= ($request->amount / 100) * (100 - $user->uver);
        $user->save();
        return redirect()->route('stav')->with('success', 'jo');
    }
}
