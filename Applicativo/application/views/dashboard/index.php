<div class="container mt-5">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col" class="d-none d-md-table-cell">ISBN</th>
                <th scope="col">Titolo</th>
                <th scope="col" class="d-none d-md-table-cell">Anno</th>
                <th scope="col">Autore</th>
                <th scope="col">Prezzo</th>
                <th scope="col" class="d-none d-md-table-cell">Numero Copie</th>
                <th scope="col" class="d-none d-md-table-cell"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($books as $book) : ?>
            <tr>
                <form class="update-copies-form" method="post" action="<?php echo URL ?>bookinfo/update/<?php echo $book->getId() ?>">
                    <td class="align-middle" onclick="location.href = '/bookinfo/book/<?php echo $book->getId() ?>'"><i class="fa-solid fa-circle-info fs-2" style="color: var(--bs-blue);"></i></td>
                    <td class="d-none d-md-table-cell align-middle"><?php echo $book->getIsbn() ?></td>
                    <td class="align-middle"><?php echo $book->getTitle() ?></td>
                    <td class="d-none d-md-table-cell align-middle"><?php echo $book->getReleaseYear() ?></td>
                    <td class="align-middle"><?php echo $book->getAuthor()->getName() . " " . $book->getAuthor()->getSurname() ?></td>
                    <td class="align-middle">CHF <?php echo $book->getPrice() ?></td>
                    <td class="d-none d-md-table-cell align-middle">
                        <div class="input-group align-items-center">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number btn-decrement">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </span>
                            <input type="number" name="copies" class="form-control input-number mx-1" style="max-width: 100px;" value="<?php echo $book->getCopies() ?>" min="0">
                             <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number btn-increment">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </span>
                        </div>
                    </td>
                    <td class="d-none d-md-table-cell align-middle">
                        <button type="submit" class="btn btn-primary">Salva</button>
                    </td>
                </form>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.btn-decrement').on('click', function () {
            const inputElement = $(this).closest('.input-group').find('.input-number');
            let currentValue = parseInt(inputElement.val(), 10);
            if(isNaN(currentValue)){
                currentValue = 0;
            }

            if (currentValue > 0) {
                inputElement.val(currentValue - 1);
            }
        });

        $('.btn-increment').on('click', function () {
            const inputElement = $(this).closest('.input-group').find('.input-number');
            let currentValue = parseInt(inputElement.val(), 10);
            if(isNaN(currentValue)){
                currentValue = 0;
            }

            inputElement.val(currentValue + 1);
        });
    });
</script>