
<?php

class Station_logout extends Controller
{

   public function index()
   {
      Auth :: logout();
      redirect('home');
   }
}
