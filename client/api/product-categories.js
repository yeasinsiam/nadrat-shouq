import axios from "@/utils/axios";

export default async function apiGetProductCategories() {
  return await axios.get(`/product-categories`).then((res) => res.data);
}
