NAME=sliphp
LOCAL_CONTAINER=sbstjn/$(NAME)

help:
		@make -qp | awk -F':' '/^[a-zA-Z0-9][^$$#\/\t=]*:([^=]|$$)/ {split($$1,A,/ /);for(i in A)print A[i]}'
		
test:
		phpunit

container:
		docker build -t "$(LOCAL_CONTAINER)" .

run: container
		docker run -p 3000:80 --rm "$(LOCAL_CONTAINER)"
