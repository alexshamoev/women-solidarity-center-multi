<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DefaultModuleSteps extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: insert("INSERT INTO `module_steps` (`top_level`, `title`, `db_table`, `images`, `possibility_to_add`, `possibility_to_delete`, `possibility_to_rang`, `possibility_to_edit`, `use_existing_step`, `blocks_max_number`, `rang`, `created_at`, `updated_at`) VALUES
                    (7, 'კატეგორია', 'photo_gallery_step_0', 1, 1, 1, 1, 1, 0, 1, 5, '2021-01-02 16:48:50', '2022-03-11 12:53:32'),
                    (15, 'გვერდი', 'pages_step_0', 0, 1, 1, 1, 1, 0, 0, 0, '2021-01-17 16:59:38', '2022-03-08 09:02:01'),
                    (1, 'კატეგორია', 'news_step_0', 1, 1, 1, 1, 1, 0, 0, 10, '2021-01-22 15:29:52', '2021-12-27 14:37:46'),
                    (1, 'ქვე-კატეგორია', 'news_step_1', 1, 1, 1, 1, 1, 0, 0, 5, '2021-01-22 16:29:15', '2021-12-27 14:37:12'),
                    (1, 'სიახლე', 'news_step_2', 1, 1, 1, 1, 1, 0, 0, 0, '2021-01-22 16:29:37', '2021-12-27 14:36:23'),
                    (14, 'პარტნიორი', 'partners_step_0', 1, 1, 1, 1, 1, 0, 0, 0, '2021-03-19 07:59:03', '2021-10-14 12:59:35'),
                    (16, 'მენიუს ღილაკი', 'menu_buttons_step_0', 0, 0, 0, 0, 0, 0, 0, 0, '2021-05-07 07:36:36', '2021-12-14 11:14:33'),
                    (1, 'ფოტო', 'news_step_3', 1, 1, 1, 1, 1, 0, 0, 0, '2021-05-28 09:32:18', '2021-12-27 14:35:45'),
                    (7, 'ფოტო', 'photo_gallery_step_1', 1, 0, 0, 0, 0, 0, 0, 0, '2021-11-17 10:30:01', '2021-11-17 10:30:19'),
                    (16, 'ქვე-მენიუს ღილაკი', 'menu_buttons_step_1', 0, 1, 1, 1, 1, 0, 0, 0, '2021-12-13 16:02:11', '2021-12-13 16:02:51')");
    }
}
