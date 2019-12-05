{{--modals starts--}}
@include('subscriber.modals.subs-modal')
@include('subscriber.modals.mdb-modals.subscription.not-sub-modal')
@include('subscriber.modals.profile-modals.edit-about-modal')
@include('subscriber.modals.profile-modals.edit-educational-modal')


@include('subscriber.modals.prompt-info.add-to-fav-modal')

@include('subscriber.modals.subs-modal')
@include('subscriber.modals.sub-confirm')



{{--modals ends--}}


{{--Scripts starts--}}
@include('subscriber.scripts.search-jobs-by-category-js')
@include('subscriber.scripts.send-verify-code-sms-js')
@include('subscriber.scripts.info.add-to-fav-js')
@include('subscriber.scripts.pages-navigator-js')

@include('subscriber.scripts.profile.update-about-js')
@include('subscriber.scripts.profile.update-education-js')

@include('subscriber.scripts.profile.upload-image-js')
@include('subscriber.scripts.profile.file-upload-js')

@include('subscriber.scripts.show-text-part-script')
@include('subscriber.scripts.element-in-view-script')

@include('subscriber.scripts.show-text-part-script')
@include('subscriber.scripts.element-in-view-script')

@include('subscriber.scripts.paginations.categories-pagination-js')

@include('subscriber.modals.apply-job.apply-job-modal')

@include('subscriber.modals.unsubscribe-form-modal')
@include('subscriber.modals.add-to-fav-form-modal')
@include('subscriber.modals.delete-from-fav-form-modal')

{{--Scripts ends--}}
