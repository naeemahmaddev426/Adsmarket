<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function toggleReadStatus($id)
    {
        try {
            // Check if the notification exists for the authenticated user
            $notification = Auth::user()->notifications()->findOrFail($id);
    
            // Only mark as read if it's currently unread
            if (!$notification->read_at) {
                $notification->markAsRead();  // Mark as read
            }
            return response()->json(['success' => true]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Notification not found'
            ], 404);
        } catch (\Exception $e) {
            \Log::error('Error toggling read status: ' . $e->getMessage());
            return response()->json([
                'success' => false, 
                'message' => 'An error occurred'
            ], 500);
        }
    }
    public function markAsRead($id)
	{
		try {
			$notification = Auth::user()->notifications()->findOrFail($id);
			if (!$notification->read_at) {
				$notification->markAsRead();
			}
			return response()->json(['success' => true]);
		} catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
			return response()->json(['success' => false, 'message' => 'Notification not found'], 404);
		} catch (\Exception $e) {
			\Log::error('Error marking notification as read: ' . $e->getMessage());
			return response()->json(['success' => false, 'message' => 'An error occurred'], 500);
		}
	}

    

    
}
