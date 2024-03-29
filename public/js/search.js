$(function () {
    // CSRF Token
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('[name="csrf-token"]').attr('content') }
    });

    const $searchButton = $('.js-search-button');
    const $productTable = $('.js-product-table');
    const $productTableBody = $productTable.find('tbody');
    const $deleteButton = $('.js-delete-button');

    $productTable.tablesorter({
        headers: {
            '.js-tablesorter-exclusion': { sorter: false }
        }
    });

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
            $productTableBody.empty();

            $.each(data, (i) => {
                $productTableBody.append(`
                    <tr>
                        <th class="text-center">${data[i].id}</th>
                        <td><img src="${data[i].img_path}" alt="${data[i].product_name}" width="100" height="100" class="img-thumbnail"></td>
                        <td>${data[i].product_name}</td>
                        <td>${data[i].price}</td>
                        <td>${data[i].stock}</td>
                        <td>${data[i].company_id}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="./detail/${data[i].id}" class="btn btn-outline-primary btn-sm text-nowrap">詳細</a>
                                <button type="button" class="ms-2 btn btn-outline-danger btn-sm text-nowrap js-delete-button" data-product-id="${data[i].id}" data-product-name="${data[i].product_name}">削除</button>
                            </div>
                        </td>
                    </tr>
                `);
            });

            $productTable.trigger("update");
        })
        .fail(() => {
            console.log('error');
        });
    });

    $('body').on('click', '.js-delete-button', function (e) {
        const $this = $(this);
        const productName = $this.attr('data-product-name');
        const productId = $this.attr('data-product-id');

        if (window.confirm(`【${productName}】を削除しますか？`)) {
            $.ajax({
                url: 'delete/' + productId,
                type: 'post'
            })
            .done(function () {
                $this.closest('tr').remove();
            })
            .fail(function () {
                alert('error');
            });
        } else {
            e.preventDefault();
        }
    });
})
