<?php


namespace App\Http\Controllers\View\Admin;


use App\Entity\Admin;
use App\Http\Controllers\View\Controller;

class AdminController extends Controller
{
    public function adminCompetence(){
        return view("/admin/admin_Competence");
    }

    public function competence(){
        return view("/admin/Competence");
    }

    public function administrator(){
        return view("/admin/administrator");
    }

    public function adminInfo()
    {
        $adminMessage = $this->getAdminMessage();
        $admin = new Admin();
        $adminMessage = $admin->getAdminMessage($adminMessage['id']);
        $adminHistoryMessage = $admin->getAdminHistoryMessage($adminMessage[0]['id']);

        return view("/admin/admin_info")->with([
            'adminMessage' => $adminMessage,
            'adminHistoryMessage' => $adminHistoryMessage,
        ]);
    }
}