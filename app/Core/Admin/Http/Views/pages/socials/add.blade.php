@extends('Core.Admin.Http.Views.layout', [
    'title' => __('admin.title', ['name' => __('admin.socials.add')]),
])

@push('header')
    @at('Core/Admin/Http/Views/assets/styles/pages/socials.scss')
@endpush

@push('content')
    <div class="admin-header d-flex align-items-center">
        <a href="{{ url('admin/socials/list') }}" class="back_btn">
            <i class="ph ph-caret-left"></i>
        </a>
        <div>
            <h2>@t('admin.socials.add_title')</h2>
            <p>@t('admin.socials.add_description')</p>
        </div>
    </div>

    <form id="add">
        @csrf
        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label required">
                <label for="key">
                    @t('admin.socials.social_label')
                </label>
            </div>
            <div class="col-sm-9">
                <select name="key" id="key" class="form-control">
                    @foreach ($drivers as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label required">
                <label for="icon">
                    @t('admin.socials.social_icon_label')
                </label>
            </div>
            <div class="col-sm-9">
                <div class="d-flex align-items-center">
                    <div id="icon-output"></div>
                    <input name="icon" id="icon" placeholder="@t('admin.socials.social_icon_label')" type="text" class="form-control"
                        required>
                </div>
            </div>
        </div>

        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label required">
                <label for="settings">
                    @t('admin.socials.settings_label')
                </label>
            </div>
            <div class="col-sm-9">
                <div id="editor">{
                    "keys": {
                    "secret": "",
                    "id": ""
                    }
                    }</div>
            </div>
        </div>

        <!-- Readonly inputs for redirect_uris -->
        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label">
                <label for="redirectUri1">Redirect URI 1</label>
            </div>
            <div class="col-sm-9" data-tooltip="Copy" data-tooltip-conf="top">
                <input id="redirectUri1" type="text" class="form-control" readonly
                    value="{{ url('social/' . $drivers[array_key_first($drivers)]) }}"
                    data-copy="{{ url('social/' . $drivers[array_key_first($drivers)]) }}">
            </div>
        </div>
        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label">
                <label for="redirectUri2">Redirect URI 2</label>
            </div>
            <div class="col-sm-9" data-tooltip="Copy" data-tooltip-conf="top">
                <input id="redirectUri2" type="text" class="form-control" readonly
                    value="{{ url('profile/social/bind/' . $drivers[array_key_first($drivers)]) }}"
                    data-copy="{{ url('profile/social/bind/' . $drivers[array_key_first($drivers)]) }}">
            </div>
        </div>

        <div class="position-relative row form-group">
            <div class="col-sm-3 col-form-label">
                <label for="enabled">
                    @t('admin.socials.enabled')</label>
                <small>@t('admin.socials.enabled_description')</small>
            </div>
            <div class="col-sm-9">
                <input name="enabled" checked role="switch" id="enabled" type="checkbox" class="form-check-input">
                <label for="enabled"></label>
            </div>
        </div>

        <!-- Кнопка отправки -->
        <div class="position-relative row form-check">
            <div class="col-sm-9 offset-sm-3">
                <button type="submit" data-save class="btn size-m btn--with-icon primary">
                    @t('def.save')
                    <span class="btn__icon arrow"><i class="ph ph-arrow-right"></i></span>
                </button>
            </div>
        </div>
    </form>
@endpush

@push('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.15.1/beautify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" type="text/javascript" charset="utf-8"></script>

    @at('Core/Admin/Http/Views/assets/js/pages/socials/add.js')
@endpush
