<?php

namespace Database\Factories;

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
    public function definition(): array
            {
                // Available programming skills
                $skills = ['PHP', 'JavaScript', 'Python', 'Java', 'C#', 'Ruby', 'Go'];

                // Shuffle and pick between 3 and 4 skills
                shuffle($skills);
                $selectedSkills = array_slice($skills, 0, rand(3, 4));

                // Choose the main programming language from selected skills
                $mainProgrammingLanguage = $this->faker->randomElement($selectedSkills);

                // Determine the framework based on the main programming language
                $frameworkMapping = [
                    'PHP' => 'Laravel',
                    'JavaScript' => 'Node.js',
                    'Java' => 'Spring Boot',
                    'Python' => 'Django',
                    'C#' => 'ASP.NET',
                    'Ruby' => 'Ruby on Rails',
                    'Go' => 'Gin',

                ];

                $framework = $frameworkMapping[$mainProgrammingLanguage] ?? $this->faker->randomElement(['React', 'Django', 'Rails', 'ASP.NET', 'Gin']);

                return [
                    'name' => $this->faker->name(),
                    'age' => $this->faker->numberBetween(18, 60),
                    'sex' => $this->faker->randomElement(['Male', 'Female']),
                    'programming_skills' => $selectedSkills, // Unique per user
                    'main_programming_language' => $mainProgrammingLanguage,
                    'framework' => $framework,
                    'database' => $this->faker->randomElement(['MySQL', 'PostgreSQL', 'MongoDB', 'SQLite']),
                    'years_of_experience' => $this->faker->numberBetween(1, 20),
                ];
            }

}
