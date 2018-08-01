<?php

namespace GMF\DevisBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PhoneValidator extends ConstraintValidator
{
  public function validate($value, Constraint $constraint)
  {
     if (preg_match( "#^0[1-9]([-. ]?[0-9]{2}){4}$#", $value))
    {
         
    }
    else
    {
        $this->context->addViolation($constraint->message);
    }
  }
}