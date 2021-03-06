<?php


namespace App\Controllers;


use App\Database\DB;
use App\Database\Repositories\PartnerRepository;
use App\Service\CreateEntities;
use App\Service\Entities;

class RowsController extends Controller
{
    public function delete(int $id)
    {
        $partnerRepository = new PartnerRepository();

        if ($partnerRepository->find($id) !== false) {
            $partnerRepository->delete($id);

            header("Location:/");
        }
    }

    public function showEditForm(int $id)
    {
        if ($id > 0) {
            $formData = DB::getRows($id)[0];
        }

        require (__DIR__ . "/../Views/edit_form.php");
    }

    /**
     * @param int $id
     */
    public function edit(int $id)
    {
        Entities::update($id, $_POST);
        header("Location:/");
    }
}