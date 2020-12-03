var app = new Vue({
	el: '#submitform',
	data: function() {
	  return {
		  title: "",
		  selected: "0",
		  message: "",
		  postsUrl: `http://localhost:8888/SocialBrothers/posts`,
		  nameinput: false,
		  categoryinput: false,
		  messageinput: false,
	  }
	},
	methods: {
		submit: function() {

			this.nameinput = false
			this.categoryinput = false
			this.messageinput = false

			if(this.title == ''){
				this.nameinput = true
			}if(this.selected < 1){
				this.categoryinput = true
			}if(this.message == ''){
				this.messageinput = true
			}
			else{

				var data = JSON.stringify({
					"title": this.title, 
					'category' : this.selected,
					'header' : this.image,
					"message" : this.message,
				});
				var config = {
				method: 'post',
				url: 'http://localhost:8888/SocialBrothers/wp-json/wp/v2/posts',
				headers: { 
					'Content-Type': 'application/json'
				},
				data : data
				};

				axios(config)
				.catch(function (error) {
				console.log(error);
				});
					this.title = ""
					this.selected = "0"
					this.image = ""
					this.message = ""
			}
		  },
	}
  })