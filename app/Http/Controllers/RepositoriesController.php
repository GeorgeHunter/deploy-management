<?php

namespace App\Http\Controllers;

use App\Repository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RepositoriesController extends Controller
{
    public function index()
    {
        return view('repositories.index');
    }

    public function show($repository)
    {

        $repository = Repository::where('id', $repository)->with('targets')->first();

//        return $repository->targets->where('name', 'Boss')->count();

        if($repository->targets->where('name', 'Boss')->count() > 0) {
            $boss_exists = true;
        } else {
            $boss_exists = false;
        }

        return view('repositories.show', compact('repository', 'boss_exists'));
    }

    public function create()
    {
        $repos = $this->getRepoList();

        return view('repositories.create', compact('repos'));
    }
    
    public function store()
    {
        $repository = new Repository();

        $repository->team_id = auth()->user()->current_team;
        $repository->name = request('name');
        $repository->prefix = request('prefix');
        $repository->url = request('repo_url');

        $repository->save();

    }


    protected function getRepoFiles()
    {
        $client = new Client();

        $token = '5fe85c4d5958083cd231ba0f20cc4aba793dbcaa';

        $url = 'https://' . $token . '@' . str_after('https://github.com/GeorgeHunter/ui-toolkit/archive/master.zip', '//');

        $res = $client->request('GET', $url)->getBody();

        Storage::put("test-master2.zip", $res);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function getRepoList()
    {
        $client = new Client();

        $token = '5fe85c4d5958083cd231ba0f20cc4aba793dbcaa';

        $res = $client->request('GET', "https://api.github.com/user/repos?access_token=$token");

        return $repos = json_decode($res->getBody());

    }


}
