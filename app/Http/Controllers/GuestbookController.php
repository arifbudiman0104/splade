<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Splade;
use Illuminate\Support\Facades\Redirect;

class GuestbookController extends Controller
{
    public function index()
    {
        $pinned_guestbooks = Guestbook::with('user')
            ->where('is_pinned', true)
            // ->orderBy('created_at', 'desc')
            // ->limit(3)
            ->get();

        $guestbooks = Guestbook::with('user')
            ->where('is_pinned', false)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('guestbook.index', compact('guestbooks', 'pinned_guestbooks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->guestbook()->create($validated);

        Splade::toast('Guestbook created successfully.')->autoDismiss(5)->rightBottom()->success();

        return redirect(route('guestbook.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Guestbook $guestbook)
    {
        if (Auth::check()) {
            if (Auth::user()->id == $guestbook->user_id || Auth::user()->is_admin == true) {
                return view('guestbook.edit', compact('guestbook'));
            } else {
                Splade::toast('You are not authorized to edit this guestbook.')->autoDismiss(5)->rightBottom()->warning();
                return redirect()->route('guestbook.index');
            }
        } else {
            Splade::toast('You need to login to edit guestbook.')->autoDismiss(5)->rightBottom()->warning();
            return redirect()->route('guestbook.index');
        }
    }

    public function update(Request $request, Guestbook $guestbook)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $guestbook->update($validated);

        Splade::toast('Guestbook edited successfully.')->autoDismiss(5)->rightBottom()->success();

        return redirect(route('guestbook.index'));
    }

    public function destroy(Guestbook $guestbook)
    {
        if (Auth::check()) {
            if (Auth::user()->id == $guestbook->user_id || Auth::user()->is_admin == true) {
                $guestbook->delete();
                Splade::toast('Guestbook deleted successfully.')->autoDismiss(5)->rightBottom()->success();
                return redirect()->route('guestbook.index');
            } else {
                Splade::toast('Guestbook delete failed.')->autoDismiss(5)->rightBottom()->danger();
                return redirect()->route('guestbook.index');
            }
        } else {
            Splade::toast('Guestbook delete failed.')->autoDismiss(5)->rightBottom()->danger();
            return redirect()->route('guestbook.index');
        }
    }
    public function pin(Guestbook $guestbook)
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == true) {
                $guestbook->is_pinned = true;
                $guestbook->save();
                // dd($guestbook);
                Splade::toast('Guestbook pined successfully.')->autoDismiss(5)->rightBottom()->success();
                return redirect()->route('guestbook.index');
            } else {
                Splade::toast('Guestbook pin failed.')->autoDismiss(5)->rightBottom()->danger();
                return redirect()->route('guestbook.index');
            }
        } else {
            Splade::toast('Guestbook pin failed.')->autoDismiss(5)->rightBottom()->danger();
            return redirect()->route('guestbook.index');
        }
    }

    public function unpin(Guestbook $guestbook)
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == true) {
                $guestbook->is_pinned = false;
                $guestbook->save();
                // dd($guestbook);
                Splade::toast('Guestbook unpined successfully.')->autoDismiss(5)->rightBottom()->success();
                return Redirect::route('guestbook.index');
            } else {
                Splade::toast('Guestbook unpin failed.')->autoDismiss(5)->rightBottom()->danger();
                return redirect()->route('guestbook.index');
            }
        } else {
            Splade::toast('Guestbook unpin failed.')->autoDismiss(5)->rightBottom()->danger();
            return redirect()->route('guestbook.index');
        }
    }
}
