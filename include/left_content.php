<?php 
if(isset($_SESSION['username'])){
	echo "<div class='lcontent'>
           <ul class='bmenu'>
              <select onchange='window.location.href=this.value'>
                <option value='index.php'>Home</option>
                <option value='settings.php'>Settings</option>
                <option value='transaction.php'>Transaction</option>
                <optgroup label='Add'>
                  <option value='addproduct.php'>Product</option>
                  <option value='addemp.php'>Employee</option>
                  <option value='addsupplier.php'>Supplier</option>
                  <option value='addcustomer.php'>Customer</option>
                  <option value='addpromo.php'>Promo</option>
                </optgroup>
              </select>
            </ul></div>";
} ?>
