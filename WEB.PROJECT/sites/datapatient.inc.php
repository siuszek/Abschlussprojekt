<?php
if (empty(($_SESSION['username']))) { //login 
?>
    <div class="container jumbotron">
        <form class="px-4 py-3" id="login" method="post">
            <div class="form-group">
                <label for="exampleDropdownFormEmail1">Email address</label>
                <input type="email" name="username" id="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
            </div>
            <div class="form-group">
                <label for="exampleDropdownFormPassword1">Password</label>
                <input type="password" name="password" id="email" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="remember" id="pass" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck"> 
                        Remember me
                    </label>
                </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Sign in</button>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Are you a new USER here: Sign up</a>
        <a class="dropdown-item" href="#">DID YOU Forgot password? no worries click here </a>
    </div>
<?php } else { ?>
    <div class="jumbotron">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Salutation</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">PLZ</th>
                    <th scope="col">Ort</th>
                    <th scope="col">Benutzername</th>
                    <th scope="col">Passwort</th>
        
                    
                    <th scope="col">delete patient</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cnt = 1; //starting value: number of patients 
                $user = !empty($_SESSION['username'])?"&user=".$_SESSION['username']:""; //get username from current session
                if (isset($_SESSION['patientendaten'])) {  //array of patient data (from session)
                    foreach ($_SESSION['patientendaten'] as $v) { //patient data is saved in varible v
                        $tester = 0;
                        echo '<tr><th scope="row">' . $cnt . '</th>'; //listed number of patients
                        foreach ($v as $key => $value) {  //values assigned to each key 
                            $tester++; //count the total values of the patient (11 inputs)
                            if ($value != 'Patient')
                                echo '<th scope="row">' . $value . '</th>';
                            if ($tester == 11) //post all the data if its vollstaendig (11 varibales) then display delete button. 
                                echo '<th scope="row"><form method="POST" action="index.php?site=datapatient'.$user.'"><button type="submit" name="delete'.$cnt.'" class="btn btn-dark">DEL</button></th>';
                        }
                        echo "</tr>"; //row is complete with data 
                        $cnt++;  //count up for each new patient 
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
<?php } ?>