import axios from "@/utils/axios";

export default async function apiGetContactInfo() {
  return await axios.get(`/contact-info`).then((res) => res.data);
}
