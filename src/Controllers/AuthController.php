<?php
/**
 * File name: AuthController.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;

use Common\Authentication\FileBased;
use Common\Authentication\InMemory;
use Common\Authentication\MySQLBased;

/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * Function execute
     *
     * @access public
     */
    public function action()
    {
        $postData = $this->request->getPost();

        //if ($postData->ValidationOption === 'InMemoryAuth')
        //   echo 'testy';
        //echo 'Authenticate the above two different ways' . var_dump($postData);

        // example code: $auth = new Authentication($postData['username'], $postData['password']);
        //$auth = new Authentication($postData->username, $postData->password, $postData->ValidationOption);
        //$auth = new FileBased //Put new object where IAuthentication.php folder and extend Controller

		if ($postData->ValidationOption === 'InMemoryAuth') 
		{
			$auth = new InMemory($postData->username, $postData->password);
			echo $auth->authenticate($postData->username, $postData->password) ? 'Valid User' : 'Invalid User login, try again.';
		}

		if ($postData->ValidationOption === 'FileBasedAuth') 
		{
			$auth = new FileBased($postData->username, $postData->password);
			echo $auth->authenticate($postData->username, $postData->password) ? 'Valid User' : 'Invalid User login, try again.';
		}

		if ($postData->ValidationOption === 'MySQLBasedAuth') 
		{
			$auth = new MySQLBased($postData->username, $postData->password);
			echo $auth->authenticate($postData->username, $postData->password) ? 'Valid User' : 'Invalid User login, try again.';
		}

    }
}
