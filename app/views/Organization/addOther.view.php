<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=ROOT?>/assets/css/loginstyles.css" rel="stylesheet">
    <title>Machiene Registration</title>
    <style>
        select {
            display: inline-block;
            margin-right: 20px;
        }
        .radio-container {
            display: flex;
            width:150px;
            flex-direction: row;
        }
        input[type="radio"] {
            visibility: hidden; /
            height: 0;
            width: 0; 
        }

        label {
        display: flex;
        flex: auto;
        vertical-align: middle;
        align-items: center;
        justify-content: center;
        text-align: center;
        cursor: pointer;
        background-color: #f1f2f3;
        color: black;
        padding: 5px 10px;
        border-radius: 6px;
        transition: color --transition-fast ease-out, 
        background-color --transition-fast ease-in;
        user-select: none;
        margin-right: 8px;
        font-size:small;
        }


        input[type="radio"]:checked + label {
        background-color: #E14761;
        color: white;
        }

        input[type="radio"]:hover:not(:checked) + label {
        background-color: #f1f2f3;
        color: black;
        }

        .dropdown{
            padding:10px;
            width: 200px;
        }
        .input-container{
            display: flex;
            flex-direction: row;
            justify-content: left;
        }
    </style>
</head>
<body id='loginpagebody'>
    <div class='container'>
        <div id='logo-side'><img id='logolarge' src='<?=ROOT?>/assets/images/whitelogo.png'></div>
        <div id="loginform">
        <div class='formtitle'>
                    <svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4962 22.5833L0.698163 12.8142C0.581865 12.6979 0.499294 12.572 0.450449 12.4363C0.401604 12.3006 0.377569 12.1552 0.378345 12.0002C0.378345 11.8451 0.402379 11.6997 0.450449 11.564C0.498519 11.4284 0.58109 11.3024 0.698163 11.1861L10.4962 1.388C10.7676 1.11664 11.1068 0.980957 11.5138 0.980957C11.9209 0.980957 12.2698 1.12633 12.5605 1.41707C12.8513 1.70782 12.9966 2.04702 12.9966 2.43468C12.9966 2.82234 12.8513 3.16154 12.5605 3.45228L4.01265 12.0002L12.5605 20.548C12.8319 20.8194 12.9676 21.154 12.9676 21.5517C12.9676 21.9494 12.8222 22.2933 12.5315 22.5833C12.2407 22.874 11.9015 23.0194 11.5138 23.0194C11.1262 23.0194 10.787 22.874 10.4962 22.5833Z" fill="#35363A"/>
                    </svg>
                <h2>Machiene Registration</h2>
            </div>
            <form method="POST"> <!-- Front end bit to get login deets -->
                <input value="<?=set_value('machieneNo')?>" class='inputsignin' type="text" name="machiene_no" placeholder="Machiene Number: XXX-nnnn" required1>
            <br>
                <div class="input-container">
                    <select id="vehicle-type" name='category' class="inputsignin dropdown">
                        <option value='' selected disabled>Select Machiene Type</option>
                        <option value="Grass Cutter">Grass Cutter</option>
                        <option value="Generators">Generators</option>
                        <option value="Boats">Boats</option>
                    </select>

                    <div class="radio-container">
                            <input type="radio" id="petrol-radio" name="fuel" value="petrol" checked>
                            <label for="petrol-radio">Petrol</label>
                            <input type="radio" id="diesel-radio" name="fuel" value="diesel">
                            <label for="diesel-radio">Diesel</label>
                    </div>
                </div>
                <br>

                <input value="<?=set_value('capacity')?>" class='inputsignin' type="number" name="capacity" placeholder="capacity" required1>
                    <br>
                <input type="checkbox" name="terms" id="terms">&ensp; I agree to the terms and conditions

                <div id="buttoncontainer">
                    <button type="reset" class="secondarybutton">Cancel</button>
                    <button type="submit" name='submit' class="primarybutton" value="Submit">Submit</button>
                </div>
                <div>
                    Already have an account? <a class="signuplink" href="login?usertype=customer">Login</a>
                </div>
            </form>
        </div> 
    </div>
</body>
</html>
