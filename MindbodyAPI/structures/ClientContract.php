<?php
namespace MindbodyAPI\structures;
class ClientContract {
	public $Action; // ActionCode
	public $ID; // int
	public $ContractName; // string
	public $SiteID; // int
	public $AgreementDate; // string
	public $OriginationLocationID; // int
	public $StartDate; // string
	public $EndDate; // string
	public $AutopayStatus; // string
	public $UpcomingAutopayEvents; // Array

}
?>