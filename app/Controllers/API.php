<?php

namespace App\Controllers; 
use CodeIgniter\HTTP\ResponseInterface;

class API extends BaseController
{
    public $error_json;
    private const APP_ID = 'YzfeftUVcZ6twZw1OoVKPRFYTrGEg01Q';
    private const APP_SECRET = '4G91qSoboqYO4Y0XJ0LPPKIsq8reHdfa';
    private $userModel;
    function __construct() {
      $this->userModel = model("UserModel");
    }
    protected function JSONValidation()
    {
        $this->error_json = null;
        if($this->request->header('Content-Type') == null) {
            $this->error_json = [
                "status" => "failure",
                "data" => "",
                "message" => "Required 'Content-Type' header is missing"
            ];
            return null;
        }
        if($this->request->header('Content-Type')->getValue() != 'application/json')
        {
            $this->error_json = [
                "status" => "failure",
                "data" => "",
                "message" => "Required 'Content-Type' header's value is not 'application/json'"
            ];
            return null;
        }
        $json = json_decode($this->request->getBody(), true);
        $message = '';
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                $message = ' - No errors';
            break;
            case JSON_ERROR_DEPTH:
                $message = ' - Maximum stack depth exceeded';
            break;
            case JSON_ERROR_STATE_MISMATCH:
                $message = ' - Underflow or the modes mismatch';
            break;
            case JSON_ERROR_CTRL_CHAR:
                $message = ' - Unexpected control character found';
            break;
            case JSON_ERROR_SYNTAX:
                $message = ' - Syntax error, malformed JSON';
            break;
            case JSON_ERROR_UTF8:
                $message = ' - Malformed UTF-8 characters, possibly incorrectly encoded';
            break;
            default:
                $message = ' - Unknown error';
            break;
        }
        if($json == null) {
            $this->error_json = [
                "status" => "failure",
                "data" => var_dump(json_decode($this->request->getBody())),
                "message" => $message
            ];
        }
        return $json;
    }
    protected function GetDataFromSmartphone()
    {
        $json = $this->JSONValidation();
        if ($json != null) {
          try {
            //$hmac = array_key_first($json);
            foreach($json as $hmac => $body) break;
            $hmac_new = base64_encode(hex2bin(hash_hmac('sha256', json_encode($body), self::APP_SECRET)));
            if ($hmac == $hmac_new && array_key_exists('appid', $body) &&
                array_key_exists('nonce', $body) && $body['appid'] == self::APP_ID &&
                $body['nonce'] != '') {
              return $body;
            }
            $this->error_json = [
              'status' => 'failure',
              'data' => $hmac.' '.$hmac_new,//null,
              'message' => 'Authorization failed!'
            ];
            //$Valori_Senzori = model('Valori_Senzori', false);
            /*return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_OK)
                    ->setJSON(['debug' => ['hmac' => $hmac, 'hmac_new' => $hmac_new]]);*/
          } catch (\Exception $e) {
              $this->error_json = [
                'status' => 'failure',
                'data' => null,
                'message' => $e->getMessage()
              ];
          }
        }
        return null;
    }

    public function SmartphoneLogin()
    {
      $body = $this->GetDataFromSmartphone();
      if ($body == null) {
        return $this->response
                  ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                  ->setJSON($this->error_json);
      }
      if (!array_key_exists('cnp', $body) || !array_key_exists('parola', $body)) {
        return $this->response
                  ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                  ->setJSON([
                    'status' => 'failure',
                    'data' => null,
                    'message' => 'Missing required fields!'
                  ]);        
      }
      $pacient = $this->userModel->get_pacient($body['cnp'], $body['parola']);
      if ($pacient == null) {
        return $this->response
                  ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                  ->setJSON([
                    'status' => 'failure',
                    'data' => null,
                    'message' => 'CNP sau parola incorecte!'
                  ]);
      }

      $example = [
        "PACIENTI" => [
          "20230610T162731Z" => [
            "id_doctor" => "0",
            "nume" => "Ionescu",
            "prenume" => "Georgescu",
            "varsta" => "30",
            "cnp" => "1700928416180",
            "localitate" => "Timișoara",
            "judet" => "Timis",
            "strada" => "Alexandru Vaida-Voievod",
            "bloc" => "Camin 9C",
            "scara" => "-",
            "etaj" => "2",
            "apartament" => "219",
            "numar" => "-",
            "telefon" => "0734937891",
            "email" => "ionescu.georgescu@yahoo.com",
            "profesie" => "programator",
            "loc_de_munca" => "Continental",
            "istoric_medicla" => "Operație de apendicită realizată în anul 2016",
            "alergii" => "Ibuprofen"
          ]
        ],
        "RECOMANDARI" => [
          "20230610T161754Z" => [
            "id_doctor" => "0",
            "tip" => "bicicleta",
            "durata" => "30",
            "alte_indicatii" => "-",
            "state" => "0"
          ],
          "20230609T123410Z" => [
            "id_doctor" => "0",
            "tip" => "înot",
            "durata" => "120",
            "alte_indicatii" => "-",
            "state" => "1"
          ]
        ],
        "ALERTE" => [
          "20230610T163120Z" => [
            "id_doctor" => "0",
            "durata_ecg_P_min" => "0.01",
            "durata_ecg_P_max" => "0.08",
            "durata_ecg_PR_min" => "0.12",
            "durata_ecg_PR_max" => "0.20",
            "amplitudine_ecg_QRS_poz_min" => "0.5",
            "amplitudine_ecg_QRS_poz_max" => "2.5",
            "amplitudine_ecg_QRS_neg_min" => "1.0",
            "amplitudine_ecg_QRS_neg_max" => "3.0",
            "durata_ecg_QRS_min" => "0.01",
            "durata_ecg_QRS_max" => "0.12",
            "durata_ecg_ST_min" => "0.01",
            "durata_ecg_ST_max" => "0.08",
            "amplitudine_ecg_T_min" => "0.1",
            "amplitudine_ecg_T_max" => "0.2",
            "durata_ecg_T_min" => "0.16",
            "durata_ecg_T_max" => "0.16",
            "val_min_puls" => "60",
            "val_max_puls" => "100",
            "val_min_umiditate" => "35",
            "val_max_umiditate" => "50",
            "val_min_temperatura" => "37.0",
            "val_max_temperatura" => "37.8"
          ]
        ],
        "VALORI_SENZORI" => [
          "20230611T151151Z" => [
            "is_alert" => "0",
            "val_senzor_ecg" => "(16000 valori)",
            "val_senzor_puls" => "80",
            "val_senzor_umiditate" => "40",
            "val_senzor_temperatura" => "37.2",
            "accelerometru_x" => "-9.81",
            "accelerometru_y" => "0",
            "accelerometru_z" => "0"
          ],
          "20230611T145134Z" => [
            "is_alert" => "14",
            "val_senzor_ecg" => "(16000 valori)",
            "val_senzor_puls" => "102",
            "val_senzor_umiditate" => "51",
            "val_senzor_temperatura" => "37.9",
            "accelerometru_x" => "-9.81",
            "accelerometru_y" => "0",
            "accelerometru_z" => "0"
          ]
        ]
      ];

      return $this->response
                ->setStatusCode(ResponseInterface::HTTP_OK)
                ->setJSON([
                  'status' => 'success',
                  'data' => json_encode($example),
                  'message' => ''
                ]);
    }

    public function GetDataFromHL7FHIR()
    {
        $observatie = [
            "resourceType" => "Observation",
            "id" => "1",
            "text" => [
                "status" => "generated",
                "div" => ""
            ],
            "identifier" => [
                "use" => "official",
                "system" => "http://www.bmc.nl/zorgportal/identifiers/observations",
                "value" => "6323"
            ],
            "status" => "final",
            "code" => [
              "coding" => [
                "system" => "http://loinc.org",
                "code" => "8867-4",
                "display" => "Heart rate"
              ]
            ],
            "subject" => [
                "reference" => "Patient/1820726412361",
                "display" => "Ionescu Popescu"
            ],
            "effectiveDateTime" => "2023-05-17T09:30:10+01:00",
              "issued" => "2023-05-17T15:30:10+01:00",
              "performer" => [
                "reference" => "Practitioner/1730730419891",
                "display" => "Georgescu Popescu"
              ],
              "valueQuantity" => [
                "value" => 107,
                "unit" => "Beats / minute",
                "system" => "http://unitsofmeasure.org",
                "code" => "{Beats}/min"
              ],
              "interpretation" => [
                "coding" => [
                  "system" => "http://terminology.hl7.org/CodeSystem/v3-ObservationInterpretation",
                  "code" => "H",
                  "display" => "High"
                ]
              ],
              "referenceRange" => [
                "low" => [
                  "value" => 60,
                  "unit" => "Beats / minute",
                  "system" => "http://unitsofmeasure.org",
                  "code" => "{Beats}/min"
                ],
                "high" => [
                  "value" => 100,
                  "unit" => "Beats / minute",
                  "system" => "http://unitsofmeasure.org",
                  "code" => "{Beats}/min"
                ]
              ]
            ];
            $data = [
              'parola' => hash('SHA256', '12345'),
              'nume'    => 'nume0',
              'prenume' => 'prenume0',
              'cnp' => 'cnp0',
              'localitate' => 'localitate0',
              'judet' => 'judet0',
              'strada' => 'strada0',
              'bloc' => 'bloc0',
              'scara' => 'scara0',
              'etaj' => 0,
              'apartament' => 0,
              'numar' => '0',
              'telefon' => '0123456789',
              'email' => 'test0@test0.com'
            ];
            $Administratori = model('Administrator', false);
            $Administratori->insert($data);
            $admin = $Administratori->findall();
            return $this->response
                        ->setStatusCode(ResponseInterface::HTTP_OK)
                        /*->setJSON([
                        "status" => "success",
                        "data" => "",
                        "message" => "trimiterea a fost salvata"
                        ]);*/
                        ->setJSON($admin);
    }
}
