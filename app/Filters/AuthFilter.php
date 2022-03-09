<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if(session()->get('email') == null){
            return redirect()->to('/');
            
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if(session()->get('email')){
            if(session()->get('role_id') == 1){

                return redirect()->to('/dashboard');

            }else{
                return redirect()->to('/user');
            }
        }

    }
}