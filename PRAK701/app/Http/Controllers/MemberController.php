<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $daftarMember = Member::latest()->get();

        return view('member.index', compact('daftarMember'));
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(StoreMemberRequest $request)
    {
        Member::create($request->validated());

        return redirect()->route('member.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Member $member)
    {
        return view('member.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->validated());

        return redirect()->route('member.index')
            ->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('member.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
