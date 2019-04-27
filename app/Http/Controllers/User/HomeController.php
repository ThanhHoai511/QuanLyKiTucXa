<?php

namespace App\Http\Controllers\User;

use App\Services\TinTucService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $tinTucService;

    public function __construct(TinTucService $tinTucService)
    {
        $this->tinTucService = $tinTucService;
    }

    public function index()
    {
        $tinTuc = $this->tinTucService->getTinTuc(config('constants.TIN_TUC'));
        $hotNews = $this->tinTucService->getHotNews();
        return view('user.layouts.trang-chu', ['tinTuc' => $tinTuc, 'hotNews' => $hotNews]);
    }
}
