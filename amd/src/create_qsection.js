define(['jquery', 'core/str', 'core/modal_factory', 'core/modal_events'], function($, str, ModalFactory, ModalEvents) {
    return {
        init: function() {

            var trigger = $("a:contains('Create Q-Review')");
            var link = trigger[0];

            var get_question = str.get_string('confirm_creation', 'local_qsection');
            $.when(get_question).done(function(question) {

                ModalFactory.create({
                    title: 'Create Q-Section',
                    body: '<p>'+question+'</p>',
                    type: ModalFactory.types.SAVE_CANCEL
                }, trigger)
                .done(function(modal) {
                    var $root = modal.getRoot();
                    $root.on(ModalEvents.save, function () { // Handle clicking on 'Save'.
                        window.location = link;
                    });
                });
            });
        }
    };
});