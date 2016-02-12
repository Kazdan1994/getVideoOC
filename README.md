# getVideoOC

Récupérer les 884 vidéos d'OpenClassroom sur Vimeo

L'utilisation de ce script nécessite le téléchargement de l'outil wget : 

https://www.gnu.org/software/wget/

Ouvrer une console, utiliser cd pour vous placer dans le dossier du projet et tapez :

sh getVideoOC.sh

```ruby
beforefilter :verifyis_admin, :only => [:new, :edit, :create, :destroy]

def index
@nombreArticles = Article.all.length
@search = Article.search(params[:q])
@articles = @search.result(:distinct => true).paginate(:page => params[:page], :per_page => 10)
end

def show
@article = Article.find(params[:id])
end

def new
@article = Article.new
end

def edit
@article = Article.find(params[:id])
end

def update
@article = Article.find(params[:id])

if @article.update(articleparams)
redirectto @article, notice: "Les modifications de l'article ont été enregistrés"
else
render 'edit', notice: "Les modifications de l'article n'ont pas été enregistrés"
end
end

def create
@article = Article.new(article_params)

if @article.save
redirect_to @article, notice: "Article enregistré"
else
render 'new', notice: "Article non enregistré"
end
end

def destroy
@article = Article.find(params[:id])
@article.destroy
redirect_to action: 'index'
end

private
def article_params
params.require(:article).permit(:titre, :contenu)
end

def verifyisadmin
(currentuser.nil?) ? redirectto(rootpath) : (redirectto(rootpath) unless currentuser.admin?)
end

end
```
