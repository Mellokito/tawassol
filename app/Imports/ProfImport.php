<?php

namespace App\Imports;

use App\Prof;
use App\Utils;
use Carbon\Carbon;
use Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProfImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure, WithBatchInserts, WithChunkReading
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try {
            /****************** générer username ***********************/
            $utils = new Utils();
            $prof = new Prof();
            $identifiant_connexion_prof = $utils->identifiantUser($row['nom'],$row['prenom'],$prof);
            /*****************************************/
            return new Prof([
                'nom_prof' => $row['nom'],
                'prenom_prof' => $row['prenom'],
                'adresse_prof' => $row['adresse'],
                'telephone_prof' => $row['telephone'],
                'email_prof' => $row['email'],
                'date_naissance_prof' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_naissance']))->format('Y-m-d'),
                'username' => $identifiant_connexion_prof,
                'password' => Hash::make($identifiant_connexion_prof),
    
                'admin_id' => Auth::id(),
            ]);
        } catch (\Throwable $th) {
            return ['Vérifiez les données excel'];
        } catch (\Error $err) {
            return back()->withErrors('Vérifiez les données excel');
        } catch (\Exception $ex) {
            return back()->withErrors('Vérifiez les données excel');
        }
    }

    public function onError(Throwable $error){
        
    }

    public function rules(): array{
        return [
            '*.email' => 'required|email|unique:profs,email_prof',
            '*.nom' => 'required',
            '*.prenom' => 'required',
            '*.adresse' => 'required',
            '*.telephone' => 'required',
            '*.date_naissance' => 'required',
        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

   
}
