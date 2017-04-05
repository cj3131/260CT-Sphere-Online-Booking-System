<?php
class UserFactory { 

    private $conn = 0;

    function __construct($param)
        //when a new object is created
    {
        $user = NULL;
        //saves it to the different types of users
        switch ($param) {
            case "free":
                $user = new FreeUserMember();
                //Add a new free member
                break;
            case "loyalty":
                $user = new LoyaltyMember();
                //Add a new loyalty member
                break;
            default:
                $user = new FreeUserMember();
                break;        
        }     
        return $user;
    }
}

abstract class AbstractUser {

    private $firstname;
    private $surname;
    private $email;
    private $phonenumber;
    private $dob;
    private $password;
    private $customerAdd1;
    private $customerAdd2;
    private $city;
    private $county;
    private $postcode;
    //Variables in the user class that are Inherited by children 
    
    //Get and set functions for each input
    public getFirstName(){
        return($firstName);
    }
    
    public getLastName(){
        return($lastName);
    }
    
    public getEmail(){
        return($email);
    }
    
    public getPhoneNumber(){
        return($phoneNumber);
    }
    
    public getDoB(){
        return($dob);
    }

    public getPassword(){
        return($password);
    }
    
    public getAddLine1(){
        return($AddLine1);
    }
    
    public getAddLine2(){
        return($AddLine2);
    }
    
    public getCity(){
        return($city);
    }
    
    public getCounty(){
        return($county);
    }
    
    public getPostcode(){
        return($postcode);
    }
    
    public setFirstName($aFirstName){
        $firstname = $aFirstName;
    }
    
    public setLastName($aLastName){
        $lastName = $aLastName;
    }
    
    public setEmail($aEmail){
        $email = $aEmail;
    }
    
    public setDoB($aDate){
        $dob = $aDate;
    }
    
    public setAddLine1($aAddLine1){
        $AddLine1 = $aAddLine1;
    }
    
    public setAddLine2($aAddLine2){
        $AddLine2 = $aAddLine2;
    }
    
    public setCity($aCity){
        $city = $aCity;
    }
    
    public setCounty($aCounty){
        $county = $aCounty;
    }
    
    public setPostcode($aPostcode){
        $postcode = $aPostcode;
    }
  
}


class FreeUserMember extends AbstractUser {
    //Inherits all of AbstractUsers varaiabla and functions
    private $discount;
    private $fee;
    
    public setFee(){
        $fee = 0;
    }

    public setDiscount(){
        $discount = 0;
    }
    
    public getFee(){
        return $fee;
    }
    
    public getDiscount(){
        return $discount;
    }
}

class LoyaltyMember extends AbstractUser {
    //Inherits all of AbstractUsers varaiabla and functions
    private $discount;
    private $fee;

    public setFee(){
        $fee = 20
    }

    public setDiscount(){
        $discount = 2;
    }
    
    public getFee(){
        return $fee;
    }
    
    public getDiscount(){
        return $discount;
    }
}
?>