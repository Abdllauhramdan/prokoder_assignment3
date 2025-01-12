<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Media::class;

    public function definition()
    {
        return [
            'file_name' => $this->faker->word . '.' . $this->faker->fileExtension,
            'file_path' => 'public/media/' . $this->faker->uuid . '.' . $this->faker->fileExtension,
        ];
    }
}
