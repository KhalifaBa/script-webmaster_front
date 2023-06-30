$(function() {
    'use strict'

    // Make the dashboard widgets sortable Using jquery UI
    $('.connectedSortable').sortable({
        placeholder: 'sort-highlight',
        connectWith: '.connectedSortable',
        handle: '.card-header, .nav-tabs',
        forcePlaceholderSize: true,
        zIndex: 999999
    })
    $('.connectedSortable .card-header').css('cursor', 'move')

    // jQuery UI sortable for the todo list
    $('.todo-list').sortable({
        placeholder: 'sort-highlight',
        handle: '.handle',
        forcePlaceholderSize: true,
        zIndex: 999999
    })

    $('#list-table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        // "language": {
        //     "search": "Recherche:",
        //     "lengthMenu": "Afficher _MENU_ enregistrements par page",
        //     "zeroRecords": "Rien trouvé - désolé",
        //     "info": "Affichage de la page _PAGE_ sur _PAGES_",
        //     "infoEmpty": "Aucun enregistrement disponible",
        //     "infoFiltered": "(filtré à partir _MAX_ total enregistrements)"
        // }
    });

    $(document).ready(function(e) {
        $(function() {
            $("[rel='tooltip']").tooltip();
        });

        function validation() {
            var valid = false;
            if ($('#name_site').val() == '') {
                valid = false;
                $('#name_site').addClass('is-invalid');
            } else {
                valid = true;
                $('#name_site').removeClass('is-invalid');
            }
            if ($('#tarif').val() == '') {
                valid = false;
                $('#tarif').addClass('is-invalid');
            } else {
                valid = true;
                $('#tarif').removeClass('is-invalid');
            }
            if ($('#name_offer').val() == '') {
                valid = false;
                $('#name_offer').addClass('is-invalid');
            } else {
                valid = true;
                $('#name_offer').removeClass('is-invalid');
            }
            if ($('#domain_name').val() == '') {
                valid = false;
                $('#domain_name').addClass('is-invalid');
            } else {
                valid = true;
                $('#domain_name').removeClass('is-invalid');
            }
            if ($('#database').val() == '') {
                valid = false;
                $('#database').addClass('is-invalid');
            } else {
                valid = true;
                $('#database').removeClass('is-invalid');
            }
            if ($('#space_disk').val() == '') {
                valid = false;
                $('#space_disk').addClass('is-invalid');
            } else {
                valid = true;
                $('#space_disk').removeClass('is-invalid');
            }

            if ($('#compte_mail').val() == '') {
                valid = false;
                $('#compte_mail').addClass('is-invalid');
            } else {
                valid = true;
                $('#compte_mail').removeClass('is-invalid');
            }
            if ($('#multisite').val() == '') {
                valid = false;
                $('#multisite').addClass('is-invalid');
            } else {
                valid = true;
                $('#multisite').removeClass('is-invalid');
            }

            if ($('#link_site').val() == '') {
                valid = false;
                $('#link_site').addClass('is-invalid');
            } else {
                valid = true;
                $('#link_site').removeClass('is-invalid');
            }

            return valid;
        }

        function validationPublicity() {
            var valid = false;
            if ($('#name_site').val() == '') {
                valid = false;
                $('#name_site').addClass('is-invalid');
            } else {
                valid = true;
                $('#name_site').removeClass('is-invalid');
            }
            if ($('#avis').val() == '') {
                valid = false;
                $('#avis').addClass('is-invalid');
            } else {
                valid = true;
                $('#avis').removeClass('is-invalid');
            }
            if ($('#statut').val() == '') {
                valid = false;
                $('#statut').addClass('is-invalid');
            } else {
                valid = true;
                $('#statut').removeClass('is-invalid');
            }
            if ($('#paiement-foxy').val() == '') {
                valid = false;
                $('#paiement-foxy').addClass('is-invalid');
            } else {
                valid = true;
                $('#paiement-foxy').removeClass('is-invalid');
            }
            if ($('#mode_pay').val() == '') {
                valid = false;
                $('#mode_pay').addClass('is-invalid');
            } else {
                valid = true;
                $('#mode_pay').removeClass('is-invalid');
            }
            if ($('#annee').val() == '') {
                valid = false;
                $('#annee').addClass('is-invalid');
            } else {
                valid = true;
                $('#annee').removeClass('is-invalid');
            }
            if ($('#type_pub').val() == '') {
                valid = false;
                $('#type_pub').addClass('is-invalid');
            } else {
                valid = true;
                $('#type_pub').removeClass('is-invalid');
            }
            if ($('#link_site').val() == '') {
                valid = false;
                $('#link_site').addClass('is-invalid');
            } else {
                valid = true;
                $('#link_site').removeClass('is-invalid');
            }
            return valid;
        }

        $("#add-data").on('click', (function(e) {
            e.preventDefault();
            $("#message").hide();
            var file_data = $('#logo').prop('files')[0];
            var form_data = new FormData();

            form_data.append('file', file_data);

            form_data.append('name_site', $('#name_site').val());
            form_data.append('avis', $('#avis').val());
            form_data.append('name_offer', $('#name_offer').val());
            form_data.append('tarif', $('#tarif ').val());
            form_data.append('domain_name', $('#domain_name').val());
            form_data.append('database', $('#database').val());
            form_data.append('space_disk', $('#space_disk').val());
            form_data.append('compte_mail', $('#compte_mail').val());
            form_data.append('multisite', $('#multisite').val());
            form_data.append('status', $('input[name="certificat"]:checked').val());
            form_data.append('link_site', $('#link_site').val());

            if (validation()) {
                $.ajax({
                    url: "ajax-add.php",
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'ko') {
                            $("#message").show();
                            $("#message").addClass('alert alert-danger').html(response.msg);
                            $('#avis').addClass('is-invalid');
                        }

                        if (response.status == 'file') {
                            $("#message").show();
                            $("#message").addClass('alert alert-danger').html('Champ Logo obligatoire');
                            $('#logo').addClass('is-invalid');
                        }
                        if (response.status == 'ok') {
                            $("#form-add")[0].reset();
                            $("#message").show();
                            $("#message").addClass('alert alert-success').html('Enregistrement avec succès');
                            setTimeout(function() { $(location).attr('href', 'index.php'); }, 2000);
                        }
                    },
                    error: function(e) {
                        $("#message").addClass('alert alert-danger').html(e);
                    }
                });
            } else {
                $("#message").addClass('alert alert-danger').html('Erreur du champ vide');
            }
        }));

        $("#edit-data").on('click', (function(e) {
            e.preventDefault();
            $("#message").hide();
            var file_data = $('#logo').prop('files')[0];
            var form_data = new FormData();

            form_data.append('file', file_data);

            form_data.append('name_site', $('#name_site').val());
            form_data.append('avis', $('#avis').val());
            form_data.append('name_offer', $('#name_offer').val());
            form_data.append('tarif', $('#tarif ').val());
            form_data.append('domain_name', $('#domain_name').val());
            form_data.append('database', $('#database').val());
            form_data.append('space_disk', $('#space_disk').val());
            form_data.append('compte_mail', $('#compte_mail').val());
            form_data.append('multisite', $('#multisite').val());
            form_data.append('status', $('input[name="certificat"]:checked').val());
            form_data.append('link_site', $('#link_site').val());
            form_data.append('id', $('#id_site').val());

            var isValid = validation();

            if (isValid) {
                $.ajax({
                    url: "ajax-edit.php",
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(data) {
                        if (data.status == 'ko') {
                            $("#message").show();
                            $("#message").addClass('alert alert-danger').html(data.msg);
                            $('#avis').addClass('is-invalid');
                        } else {
                            $("#message").show();
                            $("#form-add")[0].reset();
                            $("#message").addClass('alert alert-success').html('Modification avec succès');
                            setTimeout(function() { $(location).attr('href', 'index.php'); }, 2000);
                        }
                    },
                    error: function(e) {
                        $("#message").addClass('alert alert-danger').html(e);
                    }
                });
            } else {
                $("#message").addClass('alert alert-danger').html('Error');
            }
        }));

        $('#add-publicity').click(function(e) {
            e.preventDefault();
            $("#message").hide();
            var file_data = $('#logo').prop('files')[0];
            var form_data = new FormData();

            form_data.append('file', file_data);

            form_data.append('name_site', $('#name_site').val());
            form_data.append('avis', $('#avis').val());
            form_data.append('statut', $('#statut').val());
            form_data.append('parice_foxy', $('#paiement-foxy').val());
            form_data.append('mode_pay', $('#mode_pay').val());
            form_data.append('annee', $('#annee').val());
            form_data.append('prix', $('#prix').val());
            form_data.append('type_pub', $('#type_pub').val());
            form_data.append('link_site', $('#link_site').val());

            var isValid = validationPublicity();

            if (isValid) {
                $.ajax({
                    url: "ajax-add-buplicity.php",
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(data) {
                        if (data.status == 'ko') {
                            $("#message").show();
                            $("#message").addClass('alert alert-danger').html(data.msg);
                            $('#avis').addClass('is-invalid');
                        } else if (data.status == 'file') {
                            $("#message").show();
                            $("#message").addClass('alert alert-danger').html(data.msg);
                            $('#logo').addClass('is-invalid');
                        } else {
                            $("#message").show();
                            $("#form-add-publicity")[0].reset();
                            $("#message").addClass('alert alert-success').html('Enregistrement avec succès');
                            setTimeout(function() { $(location).attr('href', 'publication.php'); }, 2000);
                        }
                    },
                    error: function(e) {
                        $("#message").addClass('alert alert-danger').html(e);
                    }
                });
            } else {
                $("#message").addClass('alert alert-danger').html('Error');
            }
        });

        $('#update-publicity').click(function(e) {
            e.preventDefault();
            $("#message").hide();
            var file_data = $('#logo').prop('files')[0];
            var form_data = new FormData();

            form_data.append('file', file_data);

            form_data.append('name_site', $('#name_site').val());
            form_data.append('avis', $('#avis').val());
            form_data.append('statut', $('#statut').val());
            form_data.append('parice_foxy', $('#paiement-foxy').val());
            form_data.append('mode_pay', $('#mode_pay').val());
            form_data.append('annee', $('#annee').val());
            form_data.append('prix', $('#prix').val());
            form_data.append('type_pub', $('#type_pub').val());
            form_data.append('link_site', $('#link_site').val());
            form_data.append('id', $('#id_publicity').val());


            var isValid = validationPublicity();

            if (isValid) {
                $.ajax({
                    url: "ajax-update-buplicity.php",
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(data) {
                        if (data.status == 'ko') {
                            $("#message").show();
                            $("#message").addClass('alert alert-danger').html(data.msg);
                            $('#avis').addClass('is-invalid');
                        } else if (data.status == 'file') {
                            $("#message").show();
                            $("#message").addClass('alert alert-danger').html(data.msg);
                            $('#logo').addClass('is-invalid');
                        } else {
                            $("#message").show();
                            $("#message").addClass('alert alert-success').html('Enregistrement avec succès');
                            setTimeout(function() { $(location).attr('href', 'publication.php'); }, 2000);
                        }
                    },
                    error: function(e) {
                        $("#message").addClass('alert alert-danger').html(e);
                    }
                });
            } else {
                $("#message").addClass('alert alert-danger').html('Error');
            }
        });

        jQuery('#avis').keyup(function() {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });

        $('#modal-filter').on('click', function() {
            $('#filterModal').show();
        });

        $('#modal-bup-filter').on('click', function() {
            $('#filter-publicity-modal').show();
        });

        $('.close').on('click', function() {
            $('#filterModal').hide();
            $('#filter-publicity-modal').hide();
        });

        //Select 2
        $('.select2').select2();
        if ($('#select2-mode-pay').val() != "") {
            var selectedValues = $('#select2-mode-pay').val().split(',');
            $(".select2").select2({
                multiple: true,
            });
            $(".select2").val(selectedValues).trigger('change');
        }

    });
})