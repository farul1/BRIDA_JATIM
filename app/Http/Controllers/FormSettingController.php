<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;


class FormSettingController extends Controller
{
    // Update Pengaturan Umum
    public function updateGeneral(Request $request, Form $form)
    {
        $validated = $request->validate([
            'theme' => 'nullable|string',
            'is_quiz' => 'boolean',
            'allow_edit' => 'boolean',
        ]);

        $settings = $form->settings ?? [];
        $settings['general'] = array_merge($settings['general'] ?? [], $validated);

        $form->update(['settings' => $settings]);

        return back()->with('success', 'Pengaturan umum berhasil disimpan!');
    }

    // Update Notifikasi
    public function updateNotifications(Request $request, Form $form)
    {
        $validated = $request->validate([
            'email_notification' => 'boolean',
            'email_address' => 'nullable|email',
        ]);

        $settings = $form->settings ?? [];
        $settings['notifications'] = array_merge($settings['notifications'] ?? [], $validated);

        $form->update(['settings' => $settings]);

        return back()->with('success', 'Pengaturan notifikasi berhasil disimpan!');
    }

    // Update Integrasi
    public function updateIntegrations(Request $request, Form $form)
    {
        $validated = $request->validate([
            'google_sheets' => 'boolean',
            'webhook_url' => 'nullable|url',
        ]);

        $settings = $form->settings ?? [];
        $settings['integrations'] = array_merge($settings['integrations'] ?? [], $validated);

        $form->update(['settings' => $settings]);

        return back()->with('success', 'Pengaturan integrasi berhasil disimpan!');
    }
}