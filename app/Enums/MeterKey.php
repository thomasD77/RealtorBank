<?php

namespace App\Enums;

enum MeterKey : string
{
    case Single = 'Elektriciteit: enkelvoudige teller';
    case DoubleDay = 'Elektriciteit: tweevoudige teller - dag';
    case DoubleNight = 'Elektriciteit: tweevoudige teller - nacht';
    case ExclusiveNight = 'Elektriciteit: exclusief nachtmeter';
    case DigitalDay = 'Elektriciteit: digitaal afname dag (1.8.1)';
    case DigitalNight = 'Elektriciteit: digitaal afname nacht (1.8.2)';
    case DigitalInjectionDay = 'Elektriciteit: digitaal injectie dag (2.8.1)';
    case DigitalInjectionNight = 'Elektriciteit: digitaal injectie nacht (2.8.2)';
    case Water = 'Watermeter';
    case Gas = 'Gasmeter';
    case Oil = 'Inhoud stookolietank';
    case Extra = 'Extra';
}
