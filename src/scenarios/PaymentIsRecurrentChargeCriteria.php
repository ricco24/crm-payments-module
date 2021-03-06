<?php

namespace Crm\PaymentsModule\Scenarios;

use Crm\ApplicationModule\Criteria\Params\BooleanParam;
use Crm\ApplicationModule\Criteria\ScenariosCriteriaInterface;
use Nette\Database\Table\IRow;
use Nette\Database\Table\Selection;

class PaymentIsRecurrentChargeCriteria implements ScenariosCriteriaInterface
{
    public const KEY = 'is-recurrent-charge';

    public function params(): array
    {
        return [
            new BooleanParam(self::KEY, $this->label()),
        ];
    }

    public function addCondition(Selection $selection, $values, IRow $criterionItemRow): bool
    {
        $selection->where('payments.recurrent_charge = ?', $values->selection);

        return true;
    }

    public function label(): string
    {
        return 'Is recurrent charge';
    }
}
