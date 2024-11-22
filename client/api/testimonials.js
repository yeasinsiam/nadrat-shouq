import axios from "@/utils/axios";

export default async function apiGetTestimonials() {
  return await axios.get(`/testimonials`).then((res) => res.data);
}
