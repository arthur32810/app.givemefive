<?php

namespace GMF\DevisBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Phone extends Constraint
{
  public $message = "Le numéro de téléphone n'est pas correct";
}