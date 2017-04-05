<?php
public interface DataRepo{
    public void addUser($userFactory);
    public void addUser($fisrt_name,$surname,$email,$phone_number,$dob,$password,$customer_address_one,$customer_address_two,$city,$county,$postcode);
}
?>