<?php
namespace MindbodyAPI\structures;
class Contract {
	public $ID; // int
	public $Name; // string
	public $Description; // string
	public $AssignsMembershipId; // int
	public $AssignsMembershipName; // int
	public $SoldOnline; // bool
	public $ContractItems; // array
	public $IntroOffer; // string
	public $AutopaySchedule; // array
	public $NumberOfAutopays; // int
	public $AutopayTriggerType; // string
	public $ActionUponCompletionOfAutopays; // string
	public $ClientsChargedOn; // string
	public $FirstAutopayFree; // bool
	public $LastAutopayFree; // bool
	public $ClientTerminateOnline; // bool
	public $LocationPurchaseRestrictionIds; // ArrayOfInt
	public $AgreementTerms; // string
	public $RequiresElectronicConfirmation; // bool
	public $AutopayEnabled; // bool
	public $DiscountAmount; // float
	public $DepositAmount; // float
	public $FirstPaymentAmountSubtotal; // float
	public $FirstPaymentAmountTax; // float
	public $FirstPaymentAmountTotal; // float
	public $RecurringPaymentAmountSubtotal; // float
	public $RecurringPaymentAmountTax; // float
	public $RecurringPaymentAmountTotal; // float
	public $TotalContractAmountSubtotal; // float
	public $TotalContractAmountTax; // float
	public $TotalContractAmountTotal; // float

}
?>