<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Matikan foreign key constraint sementara
        Schema::disableForeignKeyConstraints();

        // Kosongkan tabel-tabel
        DB::table('employee_skill')->truncate();
        Employee::truncate();
        Skill::truncate();
        Company::truncate();

        // Aktifkan kembali constraint
        Schema::enableForeignKeyConstraints();

        // Seed data
        $company = Company::create(['name' => 'Tech Corp']);

        $employee1 = Employee::create(['name' => 'Alice', 'company_id' => $company->id]);
        $employee2 = Employee::create(['name' => 'Bob', 'company_id' => $company->id]);

        $skillPHP = Skill::create(['name' => 'PHP']);
        $skillLaravel = Skill::create(['name' => 'Laravel']);
        $skillVue = Skill::create(['name' => 'Vue.js']);

        $employee1->skills()->sync([$skillPHP->id, $skillLaravel->id]);
        $employee2->skills()->sync([$skillLaravel->id, $skillVue->id]);
    }
}
