<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Coder;
use Illuminate\Validation\Rule;

class CoderController extends Controller
{
    public function index() {
        // route --> /ninjas/
        // fetch all records & pass into the index view
  
        // $my_coders = Coder::all();
        // $my_coders = orderBy('created_at', 'desc')->get();
       // $my_coders = Coder::orderBy('created_at', 'desc')->paginate(10); // lazy loading // loading only the coder data // to access the relationship in  blade file use $coders_names->company->name  // $coders_names->company->location // $coders_names->company->description  // $coders_names->company->id   // $coders_names->company->created_at   // $coders_names->company->updated_at   // $coders_names->company->coders  // $coders_names->company->coders->name  // $coders_names->company->coders->age  // $coders_names->company->       
       $my_coders = Coder::with('company')->orderBy('created_at', 'desc')->paginate(10);  // eagar loading // loading both the coder and company data
             
  
        return view('main-pages.programmers', ['coders_names' => $my_coders]);
      }
  
      public function show($id) { // // fetch a single record & pass into show view
        $coder = Coder::with('company')->findOrFail($id); //  $coder = Coder::findOrFail($id);

        return view('main-pages.coders-show', ['coder' => $coder]);
        // route --> /ninjas/{id}
       
      }
  
      public function create() {
        $companies = Company::all();

        return view('main-pages.coders-create', ['companies' => $companies]);
      }
  
      public function store(Request $request) {
        $messages = [
          'name.required' => 'The name field is required.',
          'age.required' => 'Please enter the age.',
          'age.integer' => 'Age must be a number.',
          'age.min' => 'You must be at least 18 years old.',
          'age.max' => 'Age cannot be more than 100.',
          'sex.required' => 'Please select a gender.',
          'sex.in' => 'Gender must be either Male or Female.',
          'programming_skills.required' => 'Please add at least one programming skill.',
          'programming_skills.array' => 'Programming skills must be an array.',
          'programming_skills.*.string' => 'Each programming skill must be a valid text.',
          'main_programming_language.required' => 'Please enter your main programming language.',
          'main_programming_language.string' => 'Main programming language must be text.',
          'main_programming_language.max' => 'Main programming language should not exceed 50 characters.',
          'main_programming_language.in' => 'The main programming language must be one of the selected programming skills.',
          'framework.required' => 'The framework field is required.',
          'database.required' => 'The database field is required.',
          'years_of_experience.required' => 'Years of experience is required.',
          'years_of_experience.integer' => 'Years of experience must be a number.',
          'years_of_experience.min' => 'Years of experience cannot be negative.',
          'years_of_experience.max' => 'Years of experience cannot exceed 50 years.',
          'company_id.required' => 'Please select a company.',
          'company_id.exists' => 'The selected company is invalid.',
      ];


      $my_validated_fields = $request->validate([
          'name' => 'required|string|min:2|max:255',
          'age' => 'required|integer|min:18|max:100',
          'sex' => 'required|string|in:Male,Female',
          'programming_skills' => 'required|array', // Ensures input is an array
          'programming_skills.*' => 'string|max:50', // Each skill should be a string
          'main_programming_language' => [
            'required', 'string', 'max:50',
            Rule::in($request->programming_skills) // Ensure it exists in programming_skills array
           ],
          'framework' => 'required|string|max:50',
          'database' => 'required|string|max:50',
          'years_of_experience' => 'required|integer|min:0|max:50',
          'company_id' => 'required|exists:companies,id',
      ], $messages);

    // Convert array to JSON before saving
      $data = $request->all();
      // $data['programming_skills'] = json_encode($data['programming_skills']);  //  $data['programming_skills'] = json_encode($request->programming_skills);
      $data['programming_skills'] = json_encode($request->input('programming_skills', []));

      // If you prefer a text input instead of a multi-select, users can type their skills separated by commas: 
      // <input type="text" id="programming_skills" name="programming_skills" placeholder="e.g. JavaScript, Ruby, C#" required>
      // Then, in Laravel, convert it into an array before storing it as JSON:
      // $data['programming_skills'] = json_encode(explode(',', $data['programming_skills']));

      Coder::create($my_validated_fields);
      // Coder::create($data);   //
     
       // return redirect()->back()->with('success', 'Programmer added successfully!');
      return redirect()->route('coders.index')->with('success','Programmer added successfully!');
     
      }
  
      public function destroy($id) {
        // --> /ninjas/{id} (DELETE)
        // handle delete request to delete a ninja record from table
      }
  
      // edit() and update() for edit view and update requests
      // we won't be using these routes
}
