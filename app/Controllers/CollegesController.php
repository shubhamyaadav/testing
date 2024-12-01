<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CollegeModel;
use CodeIgniter\RESTful\ResourceController;

class CollegesController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $collegeModel;

    public function __construct()
    {
        $this->collegeModel = new CollegeModel();
    }

    // GET /colleges
    public  function index()
    {
        $filters = $this->request->getGet();

        $colleges = $this->collegeModel->getFilteredColleges($filters);
        return $this->respond($colleges);
    }

    // POST /colleges
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->validate([
            'name'     => 'required',
            'location' => 'required',
            'stream'   => 'required',
            'courses'  => 'required',
        ])) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $this->collegeModel->insert($data);

        return $this-> respondCreated(['message' => 'College added successfully']);
    }

}
