<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coder>
 */
class CoderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition(): array
    // {
    //     return [
    //         'name' => $this->faker->name(),
    //         'age' => $this->faker->numberBetween(18, 60),
    //         'sex' => $this->faker->randomElement(['Male', 'Female']),
    //         'programming_skills' => ['PHP', 'JavaScript', 'Python'], // Static example, or use faker
    //         'main_programming_language' => $this->faker->randomElement(['PHP', 'JavaScript', 'Python', 'Java']),
    //         'framework' => $this->faker->randomElement(['Laravel', 'React', 'Django', 'Spring Boot']),
    //         'database' => $this->faker->randomElement(['MySQL', 'PostgreSQL', 'MongoDB', 'SQLite']),
    //         'years_of_experience' => $this->faker->numberBetween(1, 20),
    //     ];
    // }

    // Requirements:
// ✅ Randomly selects between 3 to 4 unique programming skills.
// ✅ Ensures main_programming_language is from the chosen skills.
// ✅ Assigns the correct framework based on the main_programming_language.
// ✅ Makes sure users have different skill sets.


// ✅ Each language strictly selects one framework from the two provided options.
// ✅ Uses $this->faker->randomElement() to pick between the two frameworks dynamically.

// Example Outputs:
// If main_programming_language = "PHP", then framework is either Laravel or Symfony.

// If main_programming_language = "JavaScript", then framework is either Node.js or React.

// If main_programming_language = "Python", then framework is either Django or Flask.
    public function definition(): array
            {
                // Available programming skills
                $skills = ['PHP', 'JavaScript', 'Python', 'Java', 'C#', 'Ruby', 'Go'];

                // Shuffle and pick between 3 and 4 skills
                shuffle($skills);
                $selectedSkills = array_slice($skills, 0, rand(3, 4));

                // Choose the main programming language from selected skills
                $mainProgrammingLanguage = $this->faker->randomElement($selectedSkills);

                // Framework mapping (each language has exactly 2 options)
                $frameworkMapping = [
                    'PHP' => ['Laravel', 'Symfony'],
                    'JavaScript' => ['Node.js', 'React'],
                    'Java' => ['Spring Boot', 'Jakarta EE'],
                    'Python' => ['Django', 'Flask'],
                    'C#' => ['ASP.NET', 'Blazor'],
                    'Ruby' => ['Ruby on Rails', 'Sinatra'],
                    'Go' => ['Gin', 'Echo'],
                ];

                // Select one framework from the mapped options
                $framework = isset($frameworkMapping[$mainProgrammingLanguage])
                    ? $this->faker->randomElement($frameworkMapping[$mainProgrammingLanguage])
                    : null; // Handle cases where no mapping exists (unlikely)

                return [
                    'name' => $this->faker->name(),
                    'age' => $this->faker->numberBetween(16, 50),
                    'sex' => $this->faker->randomElement(['Male', 'Female']),
                    'programming_skills' => $selectedSkills, // Unique per user
                    'main_programming_language' => $mainProgrammingLanguage,
                    'framework' => $framework,
                    'database' => $this->faker->randomElement(['MySQL', 'PostgreSQL', 'MongoDB', 'SQLite']),
                    'years_of_experience' => $this->faker->numberBetween(1, 15),
                    'company_id' => Company::inRandomOrder()->first()->id    //query the company table created in random order and select the first id or //    Company::factory()->create()->id, // Create a company and use its ID
                ];
            }

}
