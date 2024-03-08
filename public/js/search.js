$(function () {
    const $searchButton = $('.js-search-button');

    $searchButton.on('click', function () {
        const keyword = $('.js-search-keyword').val();
        const company_id = $('.js-search-company-id').val();

        $.ajax({
            type: 'get',
            url: 'search',
            data: {
                'keyword': keyword,
                'company_id': company_id,
            },
            dataType: 'json',
        })
        .done((data) => {
            console.log(data);
        })
        .fail(() => {
            console.log('failure');
        })
    });
})
