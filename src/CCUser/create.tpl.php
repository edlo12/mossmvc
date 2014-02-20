      /**
       * Perform a creation of a user as callback on a submitted form.
       *
       * @param $form CForm the form that was submitted
       */
      public function DoCreate($form) {   
        if($form['password']['value'] != $form['password1']['value'] || empty($form['password']['value']) || empty($form['password1']['value'])) {
          $this->AddMessage('error', 'Password does not match or is empty.');
          $this->RedirectToController('create');
        } else if($this->user->Create($form['acronym']['value'],
                               $form['password']['value'],
                               $form['name']['value'],
                               $form['email']['value']
                               )) {
          $this->AddMessage('success', "Welcome {$this->user['name']}. Your have successfully created a new account.");
          $this->user->Login($form['acronym']['value'], $form['password']['value']);
          $this->RedirectToController('profile');
        } else {
          $this->AddMessage('notice', "Failed to create an account.");
          $this->RedirectToController('create');
        }
      }