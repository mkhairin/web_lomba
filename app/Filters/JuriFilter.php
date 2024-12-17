<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class JuriFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek role di session
        if (session()->get('role') !== 'juri') {
            return redirect()->to('/')->with('error', 'Access denied! Juries only.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Opsional
    }
}
