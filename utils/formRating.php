<form action="rate_operator.php" method="POST">
                        <input type="hidden" name="operator_id" value="<?php echo $operatorId; ?>">
                        <div class="form-group">
                            <label for="rating">Votre notation :</label>
                            <select name="rating" class="form-control">
                                <option value="1">1 étoile</option>
                                <option value="2">2 étoiles</option>
                                <option value="3">3 étoiles</option>
                                <option value="4">4 étoiles</option>
                                <option value="5">5 étoiles</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Votre commentaire :</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre la notation</button>
                    </form>