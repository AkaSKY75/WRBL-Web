<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CodeIgniter\Validation;

/**
 * Class CNPRules
 *
 * Provides validation methods for romanian serial identification number.
 *
 * @see https://ro.wikipedia.org/wiki/Cod_numeric_personal_(Rom%C3%A2nia)
 */
class CNPRules
{

    /**
     * Verifies that a romanian serial identification number (cnp) is valid
     *
     * A cnp will be described as follows:
     * 
     *  First character should be gendre of the person (1, 5 for men; 2, 6 for women)
     *  Second and third characters describe the year when the person was born: for 1 and 2 genre people, 
     *  the year will sum with 1900; for 5, 6 people the year will sum with 2000
     * 
     * Example:
     *  $rules = [
     *      'cnp' => 'valid_cnp'
     *  ];
     */

    public const judete = [
        '01' => 'Alba',
        '02' => 'Arad',
        '03' => 'Argeș',
        '04' => 'Bacău',
        '05' => 'Bihor',
        '06' => 'Bistrița-Năsăud',
        '07' => 'Botoșani',
        '08' => 'Brașov',
        '09' => 'Brăila',
        '10' => 'Buzău',
        '11' => 'Caraș-Severin',
        '12' => 'Cluj',
        '13' => 'Constanța',
        '14' => 'Covasna',
        '15' => 'Dâmbovița',
        '16' => 'Dolj',
        '17' => 'Galați',
        '18' => 'Gorj',
        '19' => 'Harghita',
        '20' => 'Hunedoara',
        '21' => 'Ialomița',
        '22' => 'Iași',
        '23' => 'Ilfov',
        '24' => 'Maramureș',
        '25' => 'Mehedinți',
        '26' => 'Mureș',
        '27' => 'Neamț',
        '28' => 'Olt',
        '29' => 'Prahova',
        '30' => 'Satu Mare',
        '31' => 'Sălaj',
        '32' => 'Sibiu',
        '33' => 'Suceava',
        '34' => 'Teleorman',
        '35' => 'Timiș',
        '36' => 'Tulcea',
        '37' => 'Vaslui',
        '38' => 'Vâlcea',
        '39' => 'Vrancea',
        '40' => 'București',
        '41' => 'București S.1',
        '42' => 'București S.2',
        '43' => 'București S.3',
        '44' => 'București S.4',
        '45' => 'București S.5',
        '46' => 'București S.6',
        '51' => 'Călărași',
        '52' => 'Giurgiu'
    ];

    public const numar_cifra_control = '279146358279';

    public function valid_cnp(string $cnp, ?string &$error): bool
    {
        $an = null;
        $luna = $cnp[3]*10 + $cnp[4];
        $zi = $cnp[5]*10 + $cnp[6];
        $judet = $cnp[7].$cnp[8];
        $cifra_control = 0;

        if ($cnp[0] !== '1' && $cnp[0] !== '2' && $cnp[0] !== '5' && $cnp[0] !== '6') {
            $error = 'Prima cifra din CNP este invalidă!';
            return false;
        }

        switch($cnp[0]) {
            case '1':
            case '2': $an = 1900;
                      break;
            case '5':
            case '6': $an = 2000;
                      break;
        }

        $an += $cnp[1]*10 + $cnp[2];
        
        if ($luna > 12) {
            $error = 'Luna din CNP depășește valoarea 12!';
            return false;
        }

        if ($zi > 31) {
            $error = 'Ziua din CNP depășește valoarea 31!';
            return false;
        }

        if (!array_key_exists($judet, self::judete)) {
            $error = 'Județul din CNP este invalid!';
            return false;
        }

        for ($cif = 0; $cif < strlen(self::numar_cifra_control); $cif++) {
            $cifra_control += self::numar_cifra_control[$cif]*$cnp[$cif];
        }

        if ($cifra_control % 11 != $cnp[12]) {
            $error = 'Cifra de control din CNP este invalidă!';
            return false;
        }

        return true;

    }
}
