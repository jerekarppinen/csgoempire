<template>
  <div class="container">
  	<div class="data">
	  	<div v-if="!isFetching && user" class="userInfo">
	  		<table>
	  			<thead>
	  				<th>Username</th>
	  				<th>SteamID64</th>
	  				<th>Avatar</th>
	  			</thead>
	  			<tbody>
	  				<tr>
	  					<td>
	  						{{ user.username }}
	  					</td>
	  					<td>
	  						{{ user.steamid }}
	  					</td>
	  					<td>
	  						<img :src=user.avatar />
	  					</td>
	  				</tr>
	 			</tbody>
	 		</table>
	  	</div>
	  	<div class="inventory">
	 		<table>
	 			<thead>
	 				<th>
	 					Market name
	 				</th>
	 				<th>
	 					Icon
	 				</th>
	 			</thead>
	 			<tbody>
	 				<tr v-for="description in descriptions">
	 					<td>
	 						{{ description.market_name }}
	 					</td>
	 					<td>
	 						<img :src=getIcon(description.icon_url)
	 							contain
	 							height="100px"
	 							width="150px"
	 						/>
	 					</td>
	 				</tr>
	 			</tbody>
	 		</table>
	  	</div>
	  </div>
  </div>
</template>

<script>

import axios from 'axios';

export default {
  name: 'User',
  data() {
	return {
		user: null,
		errors: [],
		isFetching: true,
		descriptions: {},
		iconUrlPrefix: 'https://steamcommunity-a.akamaihd.net/economy/image/'
	}
  },
  methods: {
  	getIcon(postFix) {
  		return this.iconUrlPrefix + postFix
  	},
  	getInventory() {
		axios.get('http://localhost:3000/user/inventory/' + this.$route.params.id)
			.then(response => {
				this.descriptions = response.data.descriptions
		})
		.catch(e => {
			this.errors.push(e)
		})
  	},
  	getUser() {
		axios.get('http://localhost:3000/user/' + this.$route.params.id)
			.then(response => {
				this.user = response.data[0]
				this.isFetching = false
		})
		.catch(e => {
			this.errors.push(e)
		})
  	}
  },
  created() {
	this.getUser()
	this.getInventory()
  }
}
</script>

<style scoped>

.container {
	text-align: center;
}

.userInfo {
	border: 1px red solid;
}

.inventory {
	margin-top: 100px;
	border: 1px red solid;
}

.data {
	display: inline-block;
}

</style>
