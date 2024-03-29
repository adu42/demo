<?php

namespace Ado\Spark\Http\Controllers\Kiosk;

use Illuminate\Http\Request;
use Ado\Spark\Announcement;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Events\Kiosk\AnnouncementCreated;
use Ado\Spark\Contracts\Repositories\AnnouncementRepository;

class AnnouncementController extends Controller
{
    /**
     * The announcements repository.
     *
     * @param  \Ado\Spark\Contracts\Repositories\AnnouncementRepository
     */
    protected $announcements;

    /**
     * Create a new controller instance.
     *
     * @param  \Ado\Spark\Contracts\Repositories\AnnouncementRepository  $announcements
     * @return void
     */
    public function __construct(AnnouncementRepository $announcements)
    {
        $this->announcements = $announcements;

        $this->middleware('auth');
        $this->middleware('dev');
    }

    /**
     * Get all of the application's recent announcements.
     *
     * @return Response
     */
    public function all()
    {
        return $this->announcements->recent();
    }

    /**
     * Create a new announcement.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'action_text' => 'required_with:action_url|max:255',
            'action_url' => 'required_with:action_text',
        ]);

        event(new AnnouncementCreated($this->announcements->create(
            $request->user(), $request->all()
        )));
    }

    /**
     * Update the given announcement.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required',
            'action_text' => 'max:255',
            'action_url' => 'required_with:action_text',
        ]);

        $this->announcements->update(
            Announcement::findOrFail($id), $request->all()
        );
    }

    /**
     * Delete the announcement with the given ID.
     *
     * @param  string  $id
     * @return Response
     */
    public function destroy($id)
    {
        Announcement::findOrFail($id)->delete();
    }
}
