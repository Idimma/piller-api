<?php

use Illuminate\Database\Seeder;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $info = ['privacy', 'terms', 'about'];
        foreach($info as $key){
            DB::table('company_infos')->insert([
                'title' => $key,
                'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tellus at urna condimentum mattis pellentesque id. Imperdiet sed euismod nisi porta. Dolor sit amet consectetur adipiscing elit duis. Suscipit adipiscing bibendum est ultricies integer quis auctor elit sed. Maecenas pharetra convallis posuere morbi leo. Proin fermentum leo vel orci. Aliquet nec ullamcorper sit amet risus nullam. Odio morbi quis commodo odio aenean sed adipiscing diam. Posuere lorem ipsum dolor sit amet consectetur adipiscing. Volutpat odio facilisis mauris sit. Purus faucibus ornare suspendisse sed nisi. At in tellus integer feugiat scelerisque varius morbi enim. In nibh mauris cursus mattis molestie a. Hendrerit gravida rutrum quisque non tellus orci. Consectetur adipiscing elit ut aliquam purus sit amet luctus venenatis. In arcu cursus euismod quis viverra nibh. Non arcu risus quis varius quam quisque id.

                Mauris commodo quis imperdiet massa tincidunt nunc pulvinar sapien. Nullam vehicula ipsum a arcu. Vitae justo eget magna fermentum iaculis eu non diam phasellus. Montes nascetur ridiculus mus mauris vitae ultricies leo. Quis lectus nulla at volutpat. Sagittis aliquam malesuada bibendum arcu vitae elementum curabitur vitae. Facilisi morbi tempus iaculis urna id volutpat. Cursus eget nunc scelerisque viverra mauris in. Senectus et netus et malesuada fames ac turpis egestas maecenas. Lectus mauris ultrices eros in cursus turpis massa. Eros in cursus turpis massa. Quis ipsum suspendisse ultrices gravida. Tempus quam pellentesque nec nam aliquam sem. Semper feugiat nibh sed pulvinar proin gravida. Faucibus vitae aliquet nec ullamcorper sit. Nascetur ridiculus mus mauris vitae ultricies. Elementum sagittis vitae et leo. Egestas fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Feugiat in ante metus dictum at tempor.
                
                Lectus quam id leo in. Tempus urna et pharetra pharetra massa massa ultricies mi quis. Libero enim sed faucibus turpis in eu. Ultrices dui sapien eget mi proin sed libero enim sed. Eget mauris pharetra et ultrices neque. Volutpat consequat mauris nunc congue. Sit amet justo donec enim diam vulputate ut pharetra sit. At imperdiet dui accumsan sit amet nulla facilisi morbi tempus. Ut tellus elementum sagittis vitae et. Nunc scelerisque viverra mauris in.
                
                Egestas maecenas pharetra convallis posuere morbi leo urna molestie at. Justo eget magna fermentum iaculis eu. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit. Ornare suspendisse sed nisi lacus sed viverra tellus in. Amet volutpat consequat mauris nunc congue nisi vitae suscipit tellus. Vel facilisis volutpat est velit egestas dui id ornare arcu. Nunc scelerisque viverra mauris in aliquam sem fringilla. Vel fringilla est ullamcorper eget nulla facilisi etiam. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Sagittis aliquam malesuada bibendum arcu vitae elementum curabitur. Sollicitudin nibh sit amet commodo nulla. Ullamcorper malesuada proin libero nunc. Felis eget nunc lobortis mattis. Facilisi morbi tempus iaculis urna. Purus sit amet volutpat consequat mauris nunc.
                
                Id faucibus nisl tincidunt eget nullam non nisi est. Vestibulum lectus mauris ultrices eros in cursus turpis massa. Ullamcorper velit sed ullamcorper morbi. A diam maecenas sed enim ut sem viverra aliquet. Urna condimentum mattis pellentesque id nibh tortor. Vitae congue eu consequat ac felis. Turpis in eu mi bibendum neque egestas congue quisque. In cursus turpis massa tincidunt. At elementum eu facilisis sed odio morbi quis commodo odio. Consectetur purus ut faucibus pulvinar elementum integer. Velit dignissim sodales ut eu sem integer vitae justo. Gravida rutrum quisque non tellus orci ac. In hac habitasse platea dictumst quisque. Mattis vulputate enim nulla aliquet porttitor lacus luctus. Aenean sed adipiscing diam donec adipiscing tristique. Sit amet purus gravida quis blandit turpis cursus in hac. Ut consequat semper viverra nam libero justo laoreet sit. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet risus.'
            ]);
        }
    }
}
