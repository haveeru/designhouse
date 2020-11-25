<?php
// php artisan make:controller Designs\\DesignController
namespace App\Http\Controllers\Designs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Design;
use Illuminate\Support\Str;

class DesignController extends Controller
{
    public function update(Request $request, $id)
    {

        // design is from url


        // $this->authorize('update', $design);

        $this->validate($request, [
            'title' => ['required', 'unique:designs,title,' . $id],
            'description' => ['required', 'string', 'min:20', 'max:140'],
            //'tags' => ['required'],
            //'team' => ['required_if:assign_to_team,true']
        ]);

        $design = Design::find($id);


        $design->update([
            //'team_id' => $request->team,
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'is_live' => !$design->upload_successful ? false : $request->is_live
        ]);

        // apply the tags
        //$this->designs->applyTags($id, $request->tags);

        return response()->json($design, 200);
    }
}
